<?php

namespace App\Http\Controllers\Domain;

use App\Models\User;
use App\Models\Domain;
use App\Models\Server;
use App\Models\DomainImage;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Domain\CreateRequest;
use App\Http\Requests\Domain\UpdateRequest;

class DomainController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $domains = Domain::where('unit_id', Auth::user()->id)->get();
        return view('pages.administrator.domain.index', [
            'domains' => $domains
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $servers = Server::all();
        $users = User::where('unit_id', Auth::user()->unit_id)->get();

        return view('pages.administrator.domain.create', compact('servers', 'users'));
    }

    private function storeImage($images, string $id)
    {
        $paths = [];
        foreach ($images as $image) {
            $imageName = $image->store('domain/image', 'public');
            $paths[] = $imageName;
        }

        foreach ($paths as $path) {
            DomainImage::create([
                'domain_id' => $id,
                'url' => $path
            ]);
        }
    }

    private function storedomain($request): Domain
    {
        $request['unit_id'] = Auth::user()->unit_id;

        return Domain::create($request);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateRequest $request)
    {
        $images = $request->file('images');

        $req = $request->all();

        $domain = $this->storedomain($req);

        $this->storeImage($images, $domain->id);

        return redirect()
            ->route('administrator.domain.index')
            ->with('message', 'Produk berhasil disimpan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Domain $domain)
    {
        if ($domain->where('unit_id', Auth::user()->unit_id)) {
            $domainImages = DomainImage::where('domain_id', $domain->id)->get();

            return view('pages.administrator.domain.edit', [
                'servers' => Server::all(),
                'users' => User::where('unit_id', Auth::user()->unit_id)->get(),
                'domain' => $domain,
                'domainImages' => $domainImages
            ]);
        }

        return redirect()
            ->route('administrator.domain.index')
            ->withErrors([
                'message' => 'Anda tidak berhak mengubah produk tersebut'
            ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, Domain $domain)
    {
        if ($domain->where('unit_id', Auth::user()->unit_id)) {
            $images = $request->file('images');
            $this->storeImage($images, $domain->id);

            $req = $request->all();

            $domain->update($req);

            return redirect()
                ->route('administrator.domain.index')
                ->with('message', 'Produk berhasil diperbarui');
        }

        return redirect()
            ->withErrors([
                'messages' => 'Anda tidak berhak mengubah produk ini'
            ]);
    }

    private function destroyAllImage(string $id): void
    {
        $domainImages = DomainImage::where('domain_id', $id)->get();

        foreach ($domainImages as $domainImage) {
            Storage::delete('public/' . $domainImage->url);
            $domainImage->delete();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Domain $domain)
    {
        if ($domain->where('unit_id', Auth::user()->unit_id)) {
            $this->destroyAllImage($domain->id);
            $domain->delete();

            return redirect()
                ->route('administrator.domain.index')
                ->with('message', 'Produk berhasil dihapus');
        }

        return redirect()
            ->route('administrator.domain.index')
            ->withErrors([
                'message' => 'Anda tidak berhak menghapus produk tersebut'
            ]);
    }

    /**
     * Delete spesifi image
     */
    public function destroyImage(DomainImage $domainImage)
    {
        $prpductId = $domainImage->domain_id;

        if ($domainImage->where('unit_id', Auth::user()->unit_id)) {
            Storage::delete('public/' . $domainImage->url);
            $domainImage->delete();

            return redirect()
                ->route('administrator.domain.edit', $prpductId)
                ->with('message', 'berhasil menghapus gambar');
        }

        return redirect()
            ->route('administrator.domain.edit', $prpductId)
            ->withError('Tidak berhak kawan jangan begitu');
    }
}

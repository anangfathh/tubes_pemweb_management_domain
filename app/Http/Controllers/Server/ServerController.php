<?php

namespace App\Http\Controllers\Server;

use Illuminate\Http\Request;
use App\Models\Server;
use App\Http\Controllers\Controller;
use App\Models\Unit;

class ServerController extends Controller
{
    // Display all servers
    public function index()
    {
        $servers = server::all();
        return view('pages.administrator.server.index', compact('servers'));
    }

    // Show the form to create a new server
    public function create()
    {
        $units = Unit::all();
        return view('pages.administrator.server.create', compact('units'));
    }

    // Store a new server in the database
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:servers'
        ]);

        Server::create($request->all());
        return redirect()->route('administrator.server.index')->with('success', 'server created successfully');
    }

    // Show the form to edit a server
    public function edit(Server $server)
    {
        return view('pages.administrator.server.edit', compact('server'));
    }

    // Update a server in the database
    public function update(Request $request, Server $server)
    {
        $request->validate([
            'name' => 'required|unique:servers,name,' . $server->id
        ]);

        $server->update($request->all());
        return redirect()->route('administrator.server.index')->with('success', 'server updated successfully');
    }

    // Delete a server from the database
    public function destroy(Server $server)
    {
        $server->delete();
        return redirect()->route('administrator.server.index')->with('success', 'server deleted successfully');
    }
}

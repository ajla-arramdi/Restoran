<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;




class MenuController extends Controller
{
    public function index()
    {

        $menus = Menu::get(); // Fetch all menu items
        return view('menus.index', compact('menus')); // Pass the variable 'menus' to the view

    }

    

    public function create()
   
    {
        $categories = Category::all(); // Ambil semua data kategori
        return view('menus.create', compact('categories')); // Kirim data ke view
    }
    

    public function store(Request $request)    
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'description' => 'required|string',
            'id_category' => 'required|exists:categories,id',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        
    
    
        $image = $request->file('foto');
        $image->storeAs('public', $image->hashName()); // Store image in public storage
    
        Menu::create([
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description,
            'id_category' => $request->id_category,
            'foto' => $image->hashName(), // Store the hashed filename

            
        ]);

        return redirect()->route('menu.index');
    
       
    }

    public function edit(Menu $menu)
    {
        $categories = Category::all(); // Ambil semua kategori
        return view('menus.edit', compact('menu', 'categories')); // Kirim data menu dan kategori ke view
    }
    // Update menu
    public function update(Request $request, Menu $menu)
{
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'price' => 'required|numeric',
        'description' => 'nullable|string',
        'id_category' => 'required|exists:categories,id',
        'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
    ]);

    // Handle file upload
    if ($request->hasFile('foto')) {
        // Delete old photo if exists
        if ($menu->foto) {
            Storage::delete('public/' . $menu->foto);
        }

        $fotoPath = $request->file('foto')->store('menus', 'public');
        $validated['foto'] = $fotoPath;
    }

    $menu->update($validated);

    return redirect()->route('menus.index')->with('success', 'Menus updated successfully!');

}

    // Delete menu
    public function destroy(Menu $menu)
    {
        if ($menu->foto) {
            Storage::delete('public/' . $menu->foto);

           
        }
       
        $menu->delete();

               

        return redirect()->route('menu.index');
    }
   

    
}


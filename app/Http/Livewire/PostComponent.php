<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Post;
use phpDocumentor\Reflection\Types\This;

class PostComponent extends Component
{
    use WithPagination;

    public $view = 'create';
    public $post_id, $title, $body;

    public function render()
    {
        return view('livewire.post-component', [
            'posts' => Post::orderBy('id', 'desc')->paginate(8)
        ]);
    }


    # ELIMINAR REGISTRO
    public function destroy($id)
    {
        Post::destroy($id);
    }

    # GUARDAMOS EL COMPONENTE
    public function store()
    {
        $this->validate([
            'title' => 'required',
            'body' => 'required'
        ]);

        $post = Post::create([
            'title' => $this->title,
            'body' => $this->body,
        ]);

        $this->edit($post->id);
    }

    # EDITAR
    public function edit($id)
    {
        $post = Post::findOrFail($id);

        $this->post_id = $post->id;
        $this->title = $post->title;
        $this->body = $post->body;

        // Modificamos la vista 
        $this->view = 'edit';
    }

    # DEFAULT comportamiento por defecto
    public function default()
    {
        $this->title = '';
        $this->body = '';
        $this->view = 'create';
    }


    # UPDATE 
    public function update()
    {
        $this->validate([
            'title' => 'required',
            'body' => 'required'
        ]);

        $post = Post::findOrFail($this->post_id);

        $post->update([
            'title' => $this->title,
            'body' => $this->body,
        ]);

        $this->default();
    }
}

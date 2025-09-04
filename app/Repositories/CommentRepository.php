<?php
namespace App\Repositories;

use App\Models\Comment;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Collection;
use App\Interfaces\CommentRepositoryInterface;
use Illuminate\Pagination\LengthAwarePaginator;

class CommentRepository implements CommentRepositoryInterface
{


    public function all() : LengthAwarePaginator
    {
        return Comment::query()->latest()->paginate(10);
    }

    public function find(int $id) : Comment
    {
        return Comment::find($id);
    }

    public function create(array $data) : Comment
    {
        
        return Comment::create($data);
    }

    public function update(array $data,$id) : Comment
    {
        $comment = Comment::find($id);
       
        if ($comment) {
            $comment->update($data);
            return $comment;
        }
        return null;
    }

    public function delete(int $id) : bool
    {
        $comment = Comment::find($id);
        if ($comment) {
            return $comment->delete();
        }
        return false;
    }


    public function getActive(): Collection
    {
        return Comment::active()->get(); 
    }


}



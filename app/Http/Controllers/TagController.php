<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Tag;
use App\Http\Requests\TagCreateRequest;
use App\Http\Requests\TagUpdateRequest;

class TagController extends Controller
{
	protected $fields = [
    'tag' => '',
    'title' => '',
    'subtitle' => '',
    'meta_description' => '',
    'page_image' => '',
    'layout' => 'blog.layouts.index',
    'reverse_direction' => 0,
  ];
   public function index()
	{
		$tags = Tag::all();
		return view('projects.admin.tag.index')
            ->withTags($tags);

	}

  public function create()
  	{
    	$data = [];
    	foreach ($this->fields as $field => $default) {
      		$data[$field] = old($field, $default);
    	}
		return view('projects.admin.tag.create', $data);
    }

  public function store(TagCreateRequest $request)
  {
    $tag = new Tag();
    foreach (array_keys($this->fields) as $field) {
      $tag->$field = $request->get($field);
    }
    $tag->save();

    return redirect('/manage/admin/tag')
        ->withSuccess("The tag '$tag->tag' was created.");
  }

  public function edit($id)
  {
    $tag = Tag::findOrFail($id);
    $data = ['id' => $id];
    foreach (array_keys($this->fields) as $field) {
      $data[$field] = old($field, $tag->$field);
    }

    return view('projects.admin.tag.edit', $data);
  }

  public function update(TagUpdateRequest $request, $id)
  {
    $tag = Tag::findOrFail($id);

    foreach (array_keys(array_except($this->fields, ['tag'])) as $field) {
      $tag->$field = $request->get($field);
    }
    $tag->save();

    return redirect("/manage/admin/tag/$id/edit")
        ->withSuccess("Changes saved.");
  }

  public function destroy($id)
  {
    $tag = Tag::findOrFail($id);
    $tag->delete();

    return redirect('/manage/admin/tag')
        ->withSuccess("The '$tag->tag' tag has been deleted.");
  }
}

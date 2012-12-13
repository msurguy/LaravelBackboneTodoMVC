<?php
  
class Api_Todos_Controller extends Base_Controller {

	public $restful = true;

	public function __construct(){
		$this->filter('before', 'auth');
	}

	public $rules = array(
	        'title' => 'required'
	);

	public function get_index($id = null) 
	{
		if (is_null($id )) 
		{
			return Response::eloquent(Auth::user()->todos);
		} 
		else 
		{
			$todo = Todo::find($id);

			if(is_null($todo)){
	            return Response::json('Todo not found', 404);
	        } else {
	        	return Response::eloquent($todo);
	        }
		}
	}

	public function post_index() 
	{

		$validator = Validator::make(get_object_vars(Input::json()), $this->rules);
		if($validator->fails()) 
		{
			return Response::json($validator->errors->all(), 400);
		}
		else 
		{
			$newtodo = Input::json();

			$todo = new Todo();

			$todo->user_id = Auth::user()->id;
			$todo->title = $newtodo->title;
			$todo->completed = $newtodo->completed;

			$todo->save();
			return Response::eloquent($todo);
		}
	}

	public function put_index() 
	{
		$validator = Validator::make(get_object_vars(Input::json()), $this->rules);

		if($validator->fails()) 
		{  
			return Response::json($validator->errors->all(), 400);
		} 
		else 
		{
			$updatetodo = Input::json();

			$todo = Todo::find($updatetodo->id);
			if(is_null($todo))
	        {
	            return Response::json('Todo not found', 404);
	        }
			$todo->title = $updatetodo->title;
			$todo->completed = $updatetodo->completed;
			$todo->save();
			return Response::eloquent($todo);
		}
    }

    public function delete_index($id = null) 
    {
		$todo = Todo::find($id);

		if($todo->user_id != Auth::user()->id){
            return Response::json('You are not the owner of this todo', 404);
		}

		if(is_null($todo))
        {
            return Response::json('Todo not found', 404);
        }

		$deletedtodo = $todo;
		$todo->delete();     
		return Response::eloquent($deletedtodo);   
    } 

}

?>

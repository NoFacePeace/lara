<?php 
namespace App\Http\Controllers;

use Illuminate\Routing\Controller;
use App\Models\Student;
use Illuminate\Container\Container;
class WelcomeController extends Controller{

	public function index() {

		//return '<h1>控制器成功！！！</h1>';
		$student = Student::first();
		$data = $student->getAttributes();
		//return "id=".$data['id']."; name=".$data['name'].";age=".$data['age'];
		$app = Container::getInstance();
		$factory = $app->make('view');
		return $factory->make('welcome')->with('data', $data);
	}
}
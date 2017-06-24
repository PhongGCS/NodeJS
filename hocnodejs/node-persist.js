var storage = require('node-persist');

storage.initSync({

	dir: "students"
})

function getAllStudents(){

	var student = storage.getItemSync('students');

	if(typeof student==="undefined"){
		return[];
	}
	return student
}

function getStudent(studentID){

	var students = getAllStudents();
	var matchStudent=null;
	for(var i=0;i<student.length;i++){
		if(student[i].Id===studentID){
			matchStudent=student[i];
			break;
		}
	}

	return matchStudent;
}

function addStudent(Id,name){

	var students = getAllStudents();
	students.push({
		id:Id,
		fullten:name
	});

	storage.setItemSync('students',students)
}


function removeStudent(studentID){

	var students = getAllStudents();
	for (var i = 0; i < students.length; i++) {
		if(students[i].id===studentID){
			students.splice(i,1);
		}
	}

	storage.setItemSync('students',students)

}
function editStudent(studentID,name){
	var students = getAllStudents();
	for (var i = 0; i < students.length; i++) {
		if(students[i].id===studentID){
			students[i].fullten=name;
		}
	}

	storage.setItemSync('students',students)

}
function showStudent(){
	var students= getAllStudents();

	students.forEach(function(student_one){

		console.log(student_one.fullten+ "-------" +student_one.id)
	})

}



// Thêm sinh viên
addStudent(1, 'Cuong');
addStudent(2, 'Kinh');
addStudent(3, 'Chinh');
addStudent(4, 'Quyen');
 
// Hiển thị danh sách sinh viên
showStudent();
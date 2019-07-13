pragma solidity ^0.4.18;

contract Diploma {

    struct Student {
        uint sId;
        string fName;
        string lName;
        string schoolName;
        string country;
        string description;
    }

    mapping (address => Student) students;
    address[] public studentAccts;

    function setStudent(address _address, uint _sId, string _fName, string _lName, string _schoolName, string _country, string _sdescription) public {
        var student = students[_address];

        student.sId = _sId;
        student.fName = _fName;
        student.lName = _lName;
        student.schoolName = _schoolName;
        student.country = _country;
        student.description = _sdescription;
        studentAccts.push(_address) -1;
    }

    function getStudent() view public returns(address[]) {
        return studentAccts;
    }

    function getStudent(address _address) view public returns (uint, string, string, string, string, string) {
        return (students[_address].age, students[_address].fName, students[_address].lName, students[_address].schoolName, students[_address].country, students[_address].description);
    }

    function countStudents() view public returns (uint) {
        return studentAccts.length;
    }
}
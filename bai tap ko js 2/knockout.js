function Employee(name, age, job) {
    var self = this;
    self.name = name;
    self.age = age;
    self.job = job;
  }
  
  function EmployeeViewModel() {
    var self = this;
    
    self.employees = ko.observableArray([]);
  
    // Lấy danh sách nhân viên từ CSDL MySQL thông qua PHP
    $.ajax({
      url: "get_employees.php",
      type: "GET",
      success: function(data) {
        var employeesData = JSON.parse(data);
        employeesData.forEach(function(employeeData) {
          var employee = new Employee(employeeData.name, employeeData.age, employeeData.job);
          self.employees.push(employee);
        });
      }
    });
  
    self.selectedEmployee = ko.observable();
    self.selectedEmployeeInfo = ko.observable();
  
    self.showEmployeeInfo = function() {
      var employee = self.selectedEmployee();
      if (employee) {
        self.selectedEmployeeInfo(employee.name + ", " + employee.age + " years old, " + employee.job);
      } else {
        self.selectedEmployeeInfo("");
      }
    };
  
    self.showForm = ko.observable(false);
    self.newName = ko.observable();
    self.newAge = ko.observable();
    self.newJob = ko.observable();
  
    self.showAddUserForm = function() {
      self.showForm(true);
    };
  
    self.addUser = function() {
      var name = self.newName();
      var age = parseInt(self.newAge());
      var job = self.newJob();
  
      if (name && age && job) {
        var employee = new Employee(name, age, job);
        self.employees.push(employee);
  
        // Gửi dữ liệu tới server để lưu vào CSDL MySQL
        $.ajax({
          url: "add_employee.php",
          type: "POST",
          data: {
            name: name,
            age: age,
            job: job
          },
          success: function(response) {
            // Xử lý phản hồi từ server nếu cần
          }
        });
  
        self.newName("");
        self.newAge("");
        self.newJob("");
        self.showForm(false);
      }
    };
  
    self.deleteUser = function() {
      var employee = self.selectedEmployee();
      if (employee) {
        self.employees.remove(employee);
  
        // Gửi yêu cầu xóa nhân viên tới server và cập nhật CSDL MySQL
        $.ajax({
          url: "delete_employee.php",
          type: "POST",
          data: {
            name: employee.name
          },
          success: function(response) {
            // Xử lý phản hồi từ server nếu cần
          }
        });
      }
    };
  }
  
  ko.applyBindings(new EmployeeViewModel());
  
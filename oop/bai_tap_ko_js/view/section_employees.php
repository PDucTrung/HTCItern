<section class="section_employees">
    <!-- Employee Management -->
    <div class="em">
        <h2>Employee Management</h2>

        <!-- select box -->
        <div class="select-box">
            <select data-bind="options: employees,
                                optionsText: 'name',
                                value: selectedEmployee,
                                event: { change: showEmployeeInfo }">
            </select>

            <!-- info -->
            <p data-bind="text: selectedEmployeeInfo"></p>
        </div>

        <div class="btn-group">
            <button data-bind="click: showAddUserForm">Add User</button>
            <button data-bind="click: deleteUser">Delete</button>
        </div>

        <!-- form add -->
        <div data-bind="visible: showForm">
            <h3>Add User</h3>
            <br />
            <form data-bind="submit: addUser">
                <div>
                    <label>Name:</label>
                    <input type="text" data-bind="value: newName" required />
                </div>
                <div>
                    <label>Age:</label>
                    <input type="text" data-bind="value: newAge" required />
                </div>
                <div>
                    <label>Job:</label>
                    <input type="text" data-bind="value: newJob" required />
                </div>
                <div class="btn-group">
                    <button type="submit">Submit</button>
                    <button type="button" data-bind="click: hideAddUserForm">Cancel</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Employee list -->
    <div class="el">
        <h2>Employee list</h2>
        <ul data-bind="foreach: employees">
            <li>
                <span data-bind="text: name"></span>,
                <span data-bind="text: age"></span> Tuổi,
                <span data-bind="text: job"></span>
            </li>
        </ul>
    </div>
</section>
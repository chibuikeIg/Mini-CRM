<template>


        <div class="table-response">

            <button type="button" class="btn btn-success float-right mb-3" @click="openModal()">
                Create Employees
            </button>

            <table class="table table-bordered table-striped">

                <thead>
                    <tr>
                        <th>Full Name</th>
                        <th>Company Name</th>
                        <th>Email</th>
                        <th>Date Created</th>
                        <th></th>
                    </tr>
                </thead>

                <tbody>

                    <tr v-for="employee in employees" v-bind:key="employee.id">
                        <td>{{ employee.name }}</td>
                        <td>{{ employee.company.name }}</td>
                        <td>{{ employee.email }}</td>
                        <td>{{ employee.created_at }}</td>
                        <td>
                            <a href="#" @click="deleteEmployee(employee.id)" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                            <a href="#"  class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a>
                        </td>
                    </tr>

                </tbody>

            </table>


            <!-- Modal -->
            <div class="modal fade" id="saveEmployeeModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">

                <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Create Employee</h5>
                            </div>

                            <form @submit.prevent="saveEmployee" id="form" enctype="multipart/form-data">
                                <div class="modal-body">

                                    <div  class="form-group">
                                        <label>Employee Name</label>
                                        <input type="text" class="form-control el" v-model="employee.name" name="name">
                                        <span class="name text-danger" style="font-size:12px;"></span>
                                    </div>

                                    <div  class="form-group">
                                        <label>Employee Email</label>
                                        <input type="email" class="form-control el" v-model="employee.email" name="email">
                                        <span class="email text-danger" style="font-size:12px;"></span>
                                    </div>


                                    <div  class="form-group">
                                        <label>Employee's Company</label>
                                        <select class="form-control el"  name="company">
                                            <option value="">-- Choose --</option>
                                            <option v-for="company in companies" v-bind:key="company.id" :value="company.id">{{ company.name }}</option>
                                        </select>
                                        <span class="company text-danger" style="font-size:12px;"></span>
                                    </div>

                                    <div  class="form-group">
                                        <label>Employee Password</label>
                                        <input type="password" class="form-control el" name="password">
                                        <span class="password text-danger" style="font-size:12px;"></span>
                                    </div>
                                    
                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save</button>
                                </div>

                            </form>

                        </div>
                </div>

            </div>
           

        </div>

</template>
<script>
export default {

    data() {

        return {

            companies : [],
            employees : [],
            employee  : {

                id   : '',
                name : '',
                email: ''

            },
            employee_id : '',
            pagination : {},
            edit       : false

        }

    },

    created() {

        this.fetchEmployees()

    },

    methods : {

        fetchEmployees() {

            fetch('/admin/fetch/employees').then( response=>response.json() ).then( response=>{

                this.employees = response

            })

        },

        fetchCompanies() {

            fetch('/admin/fetch/companies').then( response=>response.json() ).then( response=>{

                this.companies = response

            })

        },

        saveEmployee() {

            let form = document.querySelector('#form');

            let formData = new FormData(form)

            if( this.edit === false ) {

                this.createEmployee(formData, form)

            } else {

                // we do update here

            }

        },

        createEmployee (formData, form) {

            fetch('/admin/employees', {

                method : "POST",
                body   : formData,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },

            }).then(response=>response.json()).then(response=>{

                if(response.success == true)  {

                     this.fetchEmployees();

                     form.reset();

                     $("#saveEmployeeModal").modal('toggle')

                } else {
                    
                    handleError(response)

                }

            }).catch(error=>console.log(error))

        },

        openModal () {

            this.fetchCompanies()

            $("#saveEmployeeModal").modal('toggle')

        },

        deleteEmployee(id) {

            if(confirm('This Employee will be permanently deleted. Do you wish to continue ?')) {

                fetch('/admin/employees/'+id+'/delete', {

                    method : 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }

                }).then(response=>response.json()).then(response=>{

                    alert('Employee has been removed from the list');

                    this.fetchEmployees();

                }).catch(error=>console.log(error))

            }

        },

    }
    
}
</script>
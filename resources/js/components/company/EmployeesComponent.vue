<template>

    <div class="card mt-5">
        <div class="card-header">
            <h3>Employees</h3>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped">

                    <thead>
                        <tr>
                            <th>Full Name</th>
                            <th>Company Name</th>
                            <th>Email</th>
                            <th>Date Created</th>
                        </tr>
                    </thead>

                    <tbody>

                        <tr v-for="employee in employees" v-bind:key="employee.id">
                            <td>{{ employee.name }}</td>
                            <td>{{ employee.company.name }}</td>
                            <td>{{ employee.email }}</td>
                            <td>{{ employee.created_at }}</td>
                        </tr>

                    </tbody>

                </table>
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
                email: '',
                company_id : ''

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

            fetch('/company/fetch/employees').then( response=>response.json() ).then( response=>{

                this.employees = response

            })

        },

    }
    
}
</script>
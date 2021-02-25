<template>
    <div class="col-md-6">

        <div class="card">

            <div class="card-header">
                <h5>Personal Details</h5>
            </div>

            <div class="card-body">

                <form @submit.prevent="updateProfile" id="form">

                    <div class="form-group mt-3">
                        <label>Full Name</label>
                        <input type="text" name="full_name" v-model="employee.name" class="form-control el">
                        <span class="full_name text-danger" style="font-size:12px;"></span>
                    </div>

                    <div class="form-group mt-3">
                        <label>Email</label>
                        <input type="email" name="email" v-model="employee.email" class="form-control el">
                        <span class="email text-danger" style="font-size:12px;"></span>
                    </div>

                    <div class="form-group mt-3">
                        <button type="submit" class="form-control btn btn-success">Save changes</button>
                    </div>

                </form>

            </div>

        </div>

    </div>
</template>

<script>
export default {

    data() {

        return {

            employee  : {

                id   : '',
                name : '',
                email: '',

            },
            employee_id : '',
        }

    },

    created() {

        this.fetchEmployee()

    },

    methods:{

        fetchEmployee() {

            fetch('/employee/show').then( response=> response.json() ).then( response=> {

                this.employee = response;

            })

        },

        updateProfile() {

            let form = document.querySelector('#form');

            let formData = new FormData(form)

            fetch('/employee/profile/update', {

                method : "POST",
                body   : formData,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },

            }).then(response=>response.json()).then( response =>{

                if(response.success == true)  {

                    this.fetchEmployee();

                    $("#heading").text('Welcome Back '+this.employee.name)

                    alert('Personal details updated successfully!')

                } else {
                    
                    handleError(response)

                }

            }).catch(error=>console.log(error))

        }

    }
    
}
</script>
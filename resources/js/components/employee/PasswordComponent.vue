<template>
    <div class="col-md-6">

        <div class="card">

            <div class="card-header">
                <h5>Change Password</h5>
            </div>

            <div class="card-body">

                <form @submit.prevent="changePassword" id="passwordForm">

                    <div class="form-group mt-3">
                        <label>Current Password</label>
                        <input type="password" name="current_password" class="form-control el">
                        <span class="current_password text-danger" style="font-size:12px;"></span>
                    </div>

                    <div class="form-group mt-3">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control el">
                        <span class="password text-danger" style="font-size:12px;"></span>
                    </div>

                    <div class="form-group mt-3">
                        <label>Confirm Password</label>
                        <input type="password" name="password_confirmation" class="form-control el">
                        <span class="password_confirmation text-danger" style="font-size:12px;"></span>
                    </div>

                    <div class="form-group mt-3">
                        <button type="submit" class="btn btn-success form-control">Change</button>
                    </div>

                </form>
                
            </div>
            
        </div>
        
    </div>
</template>
<script>
export default {

    methods:{

        changePassword() {

            let form = document.querySelector('#passwordForm');

            let formData = new FormData(form)

            fetch('/employee/change/password', {

                method : "POST",
                body   : formData,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },

            }).then(response=>response.json()).then( response =>{

                if(response.success == true)  {

                    form.reset();

                    alert('Your password has been changed successfully!')

                } else {
                    
                    handleError(response)

                }

                console.log(response)

            }).catch(error=>console.log(error))

        }

    }
    
}
</script>
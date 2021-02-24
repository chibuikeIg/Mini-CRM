<template>


        <div class="table-response">

            <button type="button" class="btn btn-success float-right mb-3" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Create Company
            </button>

            <table class="table table-bordered table-striped">

                <thead>
                    <tr>
                        <th>Company Logo</th>
                        <th>Company Name</th>
                        <th>Company Email</th>
                        <th>Company Url</th>
                        <th></th>
                    </tr>
                </thead>

                <tbody>

                    <tr v-for="company in companies" v-bind:key="company.id">
                        <td>{{ company.logo }}</td>
                        <td>{{ company.name }}</td>
                        <td>{{ company.email }}</td>
                        <td>{{ company.url }}</td>
                        <td>
                            <a href="#" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                        </td>
                    </tr>

                </tbody>

            </table>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Create Company</h5>
                            </div>

                            <form @submit.prevent="createCompany">
                                <div class="modal-body">

                                    <div  class="form-group">
                                        <label>Company Name</label>
                                        <input type="text" class="form-control el" v-model="company.name" name="name">
                                        <span class="name text-danger" style="font-size:12px;"></span>
                                    </div>

                                    <div  class="form-group">
                                        <label>Company Email</label>
                                        <input type="email" class="form-control el" v-model="company.email" name="email">
                                        <span class="email text-danger" style="font-size:12px;"></span>
                                    </div>

                                    <div  class="form-group">
                                        <label>Company Logo</label>
                                        <input type="file" class="form-control">
                                    </div>

                                    <div  class="form-group">
                                        <label>Company Url</label>
                                        <input type="text" class="form-control el" v-model="company.url" name="url">
                                        <span class="url text-danger" style="font-size:12px;"></span>
                                    </div>

                                    <div  class="form-group">
                                        <label>Company Password</label>
                                        <input type="text" class="form-control el" v-model="company.password" name="password">
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
            company   : {
                id : '',
                name : '',
                email  : '',
                logo   : '',
                url    : ''
            }, 

            company_id : '',
            pagination : {},
            edit       : false

        }

    },

    created() {

        this.fetchCompanies()

    },

    methods : {

        fetchCompanies() {

            fetch('/admin/fetch/companies').then( response=>response.json() ).then( response=>{

                this.companies = response.data

            })

        },

        createCompany () {

            fetch('/admin/companies', {

                method : "POST",
                body   : JSON.stringify(this.company),
                headers: {
                    'content-type': 'application/json',
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },

            }).then(response=>response.json()).then(response=>{


                if(response.success == true)  {

                     this.fetchCompanies();

                     $("#exampleModal").hide()

                } else {
                    
                    handleError(response)

                }
               

            }).catch(error=>console.log(error))

        }

    }
}
</script>
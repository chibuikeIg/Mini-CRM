<template>


        <div class="table-response">

            <button type="button" class="btn btn-success float-right mb-3" @click="openModal()">
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
                        <td><img :src="company.logo" width="50" height="50"></td>
                        <td>{{ company.name }}</td>
                        <td>{{ company.email }}</td>
                        <td>{{ company.url }}</td>
                        <td>
                            <a href="#" @click="deleteCompany(company.id)" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                            <a href="#" @click="editCompany(company)" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a>
                        </td>
                    </tr>

                </tbody>

            </table>

            <!-- Modal -->
            <div class="modal fade" id="saveCompanyModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Create Company</h5>
                            </div>

                            <form @submit.prevent="saveCompany" id="form" enctype="multipart/form-data">
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
                                        <input type="file" class="form-control el" name="logo">
                                        <span class="logo text-danger" style="font-size:12px;"></span>
                                        <img :src="company.logo" width="50" height="50" style="display:none;" class="preview_image">
                                    </div>

                                    <div  class="form-group">
                                        <label>Company Url</label>
                                        <input type="text" class="form-control el" v-model="company.url" name="url">
                                        <span class="url text-danger" style="font-size:12px;"></span>
                                    </div>

                                    <div  class="form-group">
                                        <label>Company Password</label>
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

                this.companies = response

            })

        },

        saveCompany () {

            let form = document.querySelector('#form');

            let formData = new FormData(form)

            if( this.edit === false ) {

                this.createCompany(formData, form)

            } else {

                this.updateCompany(formData, form)

            }

        },

        deleteCompany(id) {

            if(confirm('This company will be permanently deleted. Do you wish to continue ?')) {

                fetch('/admin/companies/'+id+'/delete', {

                    method : 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }

                }).then(response=>response.json()).then(response=>{

                    alert('Company has been removed from the list');

                    this.fetchCompanies();

                }).catch(error=>console.log(error))

            }

        },

        editCompany(company) {

            this.edit  = true;
            this.company.id    = company.id 
            this.company.name  = company.name;
            this.company.email = company.email;
            this.company.company_id = company.id
            this.company.url   = company.url;
            this.company.logo  = company.logo;

            $(".modal-title").text('Edit Company');

            $('.preview_image').show();

            $("#saveCompanyModal").modal('toggle')
        },

        openModal () {

            this.edit  = false;
            this.company.id    = '' 
            this.company.name  = '';
            this.company.email = '';
            this.company.company_id = '';
            this.company.url   = '';
            this.company.logo  = '';

            $(".modal-title").text('Create Company');

            $('.preview_image').hide();

            $("#saveCompanyModal").modal('toggle')

        },

        updateCompany(formData, form) {

            fetch('/admin/companies/'+this.company.company_id+'/update', {

                method : "POST",
                body   : formData,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },

            }).then(response=>response.json()).then( response =>{

                if(response.success == true)  {

                    this.fetchCompanies();

                    $("#saveCompanyModal").modal('toggle')

                } else {
                    
                    handleError(response)

                }

            }).catch(error=>console.log(error))

        },

        createCompany (formData, form) {

            fetch('/admin/companies', {

                method : "POST",
                body   : formData,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },

            }).then(response=>response.json()).then(response=>{

                if(response.success == true)  {

                     this.fetchCompanies();

                     form.reset();

                     $("#saveCompanyModal").modal('toggle')

                } else {
                    
                    handleError(response)

                }

            }).catch(error=>console.log(error))

        }

    }
}
</script>
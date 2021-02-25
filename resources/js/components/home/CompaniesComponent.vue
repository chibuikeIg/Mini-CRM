<template>
    <div>
        <div class="row">

            <div class="col-md-3" v-for="company in companies" v-bind:key="company.id">

                    <div class="d-flex text-muted pt-3">
                        
                        <img :src="company.logo" width="32" height="32" class="bd-placeholder-img flex-shrink-0 me-2 rounded">

                        <p class="pb-3 mb-0 small lh-sm border-bottom mr-5">
                            <strong class="d-block text-gray-dark">{{company.name}}</strong>
                            <a :href="company.url">{{company.url}}</a>
                        </p>
                    
                    </div>

            </div>
        

        </div>

        <nav aria-label="page navigation example" class="mt-4">
            <ul class="pagination">

                <li v-bind:class="[{disabled: !pagination.prev_page}]" class="page-item"><a href="#" class="page-link"
                @click="fetchCompanies(pagination.prev_page)">Previous</a></li>

                <li class="page-item disabled"><a href="#" class="page-link text-dark">Page {{ pagination.current_page }} of {{ pagination.last_page }}</a></li>

                <li v-bind:class="[{disabled: !pagination.next_page}]" class="page-item"><a href="#" class="page-link"
                @click="fetchCompanies(pagination.next_page)">Next</a></li>

            </ul>
        </nav>

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

        fetchCompanies(page_url) {

            page_url = page_url || '/companies';

            let vm = this;

            fetch(page_url).then( response=>response.json() ).then( response=>{

                this.companies = response.data

                console.log(response)

                vm.createPagination(response)

            }).catch(error=>console.log(error))

        },

        createPagination(response) {

            let pagination = {

                current_page : response.current_page,
                last_page : response.last_page,
                next_page : response.next_page_url,
                prev_page : response.prev_page_url

            }

            this.pagination = pagination

        }

    }
}
</script>
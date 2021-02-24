<template>


        <div class="table-response">

            <button type="button" class="btn btn-success float-right mb-3" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Create Company
            </button>

            <table class="table table-bordered table-striped">

                <thead>
                    <tr>
                        <th>S/N</th>
                        <th>Company Logo</th>
                        <th>Company Name</th>
                        <th>Company Email</th>
                        <th>Company Url</th>
                        <th></th>
                    </tr>
                </thead>

                <tbody>

                    <tr>
                        <td>1</td>
                        <td>sdsfdfd</td>
                        <td>sdssdsd</td>
                        <td>ssdflhksdf</td>
                        <td>sdfjhdskf</td>
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

                            <form>
                                <div class="modal-body">

                                    <div  class="form-group">
                                        <label>Company Name</label>
                                        <input type="text" class="form-control" name="company_name">
                                    </div>

                                    <div  class="form-group">
                                        <label>Company Email</label>
                                        <input type="email" class="form-control" name="company_email">
                                    </div>

                                    <div  class="form-group">
                                        <label>Company Logo</label>
                                        <input type="file" class="form-control" name="company_logo">
                                    </div>

                                    <div  class="form-group">
                                        <label>Company Url</label>
                                        <input type="text" class="form-control" name="company_url">
                                    </div>

                                    <div  class="form-group">
                                        <label>Company Password</label>
                                        <input type="text" class="form-control" name="company_password">
                                    </div>
                                    
                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary">Save</button>
                                </div>

                            </form>

                        </div>
                </div>
            </div>

        </div>

</template>
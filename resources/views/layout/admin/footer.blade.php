<footer class="py-4 bg-light mt-auto">
                        <div class="container-fluid">
                            <div class="d-flex align-items-center justify-content-between small">
                                <div class="text-muted">Copyright &copy; Paul Chibuike Igweze <span id="y"></span></div>
                            </div>
                        </div>
                    </footer>
                </div>


            </div>
            
        </div>



        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="{{ asset('js/app.js') }}"></script>
        <script>
            function handleError(response) {

                let input = document.querySelectorAll('.el'); // get all the input fields with the class `.el`

                input.forEach( (field) => {

                    let errorElement = document.querySelector('.'+field.name); // this will get any element (in our case span tag) that the class attribute value is same with the input tag name attribute value

                    // check if the input field has an error

                    if(response.hasOwnProperty(field.name)) {

                            errorElement.innerHTML = response[field.name]; // replace the text content of the span tag with the error response message

                        } else {

                            errorElement.innerHTML = ''; // else leave it empty or set it to display none.

                        }

                } );

            }
            var d = new Date();
            var n = d.getFullYear();
            document.getElementById("y").innerHTML = n;
        </script>
    </body>
</html>

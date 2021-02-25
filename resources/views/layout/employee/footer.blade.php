    <footer class="footer mt-auto py-3 bg-light">
        <div class="container">
            <div class="text-muted">Copyright &copy; Paul Chibuike Igweze <span id="y"></span></div>
        </div>
    </footer>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
    <script src="{{asset('js/bootstrap.bundle.min.js')}}" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>

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
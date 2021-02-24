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
            var d = new Date();
            var n = d.getFullYear();
            document.getElementById("y").innerHTML = n;
        </script>
    </body>
</html>

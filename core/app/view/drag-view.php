
                <section>
                    <h2>Sortable List Group  With Handles</h2>
                    <ul class="list-group list-group-sortable-handles">
                        <li class="list-group-item"><span class="glyphicon glyphicon-move"></span> Cras justo odio</li>
                        <li class="list-group-item"><span class="glyphicon glyphicon-move"></span> Dapibus ac facilisis in</li>
                        <li class="list-group-item"><span class="glyphicon glyphicon-move"></span> Morbi leo risus</li>
                        <li class="list-group-item"><span class="glyphicon glyphicon-move"></span> Porta ac consectetur ac</li>
                        <li class="list-group-item"><span class="glyphicon glyphicon-move"></span> Vestibulum at eros</li>
                    </ul>
                </section>
            
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <script src="js/jquery.sortable.js"></script>
    <script>
        $(function() {
            
            $('.list-group-sortable-handles').sortable({
                placeholderClass: 'list-group-item',
                handle: 'span'
            });
            
        });
    </script>
</body>
</html>

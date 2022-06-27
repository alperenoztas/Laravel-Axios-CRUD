<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">
        <h1 class="text-center">Axios CRUD</h1>
        <hr>
        <div class="row">
            <div class="col-8">
                <h4>Manage Category</h4>
                <table class="table table-bordered">
                    <tr>
                        <th>Sl</th>
                        <th>Name</th>
                        <th>Actions</th>
                    </tr>
                    <tbody id="tbody">

                    </tbody>
                </table>
            </div>
            <div class="col-4">
                <h4>Add New Category</h4>
                <form action="#" id="addNewDataForm">
                    <div class="form-group">
                        <input type="text" class="form-control" id="name" placeholder="Add New Category">
                    </div>
                    <div class="form-group m-3">
                        <button class="btn btn-sm btn-block btn-success send" type="submit">Add New Category</button>
                    </div>
                </form>
            </div>
        </div>
    </div>




    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
    </script>

    <script>


        function fetchDataTable(data){

            var table = '';
            $.each(data, function (key, value) {
                console.log(value);

                table = table +'<tr>'+'<td>'+value.id+
                            '</td>'+'<td>'+ value.name+
                            '<td><button class="btn btn-sm btn-primary">Edit</button><button class="btn btn-sm btn-secondary">View</button><button class="btn btn-sm btn-danger">Delete</button> </td>'+'</tr>';

            });
            $('#tbody').html(table);
        }

        function getAllData(){
            axios.get("{{ route('category.get') }}")
            .then(function(response){
                fetchDataTable(response.data);
            })
        }
        getAllData();
        //store
        $(document).ready(function() {

            $('.send').click(function(e) {
                e.preventDefault();
                var data = $('#name').val()

                axios({
                    method: 'post',
                    url: '{{ route('category.store') }}',
                    data: {
                        name: data
                    }
                })
                .then(function(response) {
                        getAllData();
                        Swal.fire(
                            'Adding Employee',
                            'Added',
                            'success'
                        )
                        console.log(response);
                    })
                    .catch(function(error) {
                        Swal.fire(
                            'Adding Employee',
                            'Not Added',
                            'error'
                        )
                        console.error(error.toJSON());
                    });

            });
        });
    </script>
</body>

</html>

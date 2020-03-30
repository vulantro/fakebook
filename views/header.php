
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css" />
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
        <style>

body{
            background-color: #e9ebee;
        }
        .card{
            width:80%;
            max-heigth:50em;
        }
        .card-body-custom{ //kép postban
        }
        .bg-fbook {
            background-color: #4267b2 !important;
            padding: .1rem 1rem;
        }
        .btn-fbook{
            color: #4a4a4a;
            background-color: #ffffff;
            border-color: transparent;
            font-weight: 700;
            transition: all .5s;
        }
        .btn-fbook:hover{
            background-color: #f0f0f0;
            border-color: transparent;
        }
        .btn-fposts{
            background-color: #f0f0f0;
            border-color: transparent;
            border-radius: 5rem;
            transition: all 0.5s;
        }
        .btn-fposts:hover{
            background-color: rgba(0,0,0,.05);
            border-color: transparent;
        }
        .h7{
            font-size: 0.87rem;
            font-weight: 600;
        }
        .h8{
            font-size: 0.78rem;
            font-weight: 600;
        }

        .offset-fixed{
            position: fixed;
            top: 0;
            bottom: 0;
        }
        .f-left{
            left: 0
        }
        .f-right{
            right: 0;
        }
        .side-left{
            margin-top: 4rem;
            margin-left: 8.07rem
        }
        .side-right{
            margin-top: 4rem;
            overflow-x: hidden;
            overflow-y: auto;
            height: calc(100vh - 7.5rem);
        }
        .img-circle{
            width: 5rem;
            height: 3.1rem;
            background-color: #f7f7f7;
            border-radius: 50%;
            border: 1px solid #dddddd;
        }
        .state{
            width: 0.5rem;
            height: 0.5rem;
            background-color: green;
            border-radius: 50%
        }
        .friend-state{
            padding: 0.57rem 0.3rem;
            cursor: pointer;
            transition: all 0.1s;
        }
        .friend-state:hover{
            background-color: #f7f7f7;
        }

        .map-icon {
            height: 52px !important;
            width: 52px !important;
            border-radius: 50%;
            border: solid;
            border-color: green;
        }

        
        @media (min-width: 1200px){
            .container {
                max-width: 1125px;
            }
            .c-navbar{
                margin-left: 7rem !important;
            }
        }
        </style>
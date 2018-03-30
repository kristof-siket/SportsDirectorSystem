<div id="mySidenav" class="sidenav">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
    <a href="{{ route('welcome') }}">Home</a>
    <a href="{{ route('dashboard') }}">Dashboard</a>
    <a href="{{ route('competitions.index') }}">Browse events</a>
    <a href="{{ route('training_plans.index') }}">Training planning</a>
    <a href="{{ route('runalyzer.index') }}">&copy Runalyzer</a>
</div>

<script>
    function openNav() {
        document.getElementById("mySidenav").style.width = "250px";
        document.getElementById("main").style.marginLeft = "250px";
        document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
    }

    function closeNav() {
        document.getElementById("mySidenav").style.width = "0";
        document.getElementById("main").style.marginLeft= "0";
        document.body.style.backgroundColor = "white";
    }
</script>


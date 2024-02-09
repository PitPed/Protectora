<style>
    header {
        display: flex;
        justify-content: center;
        padding: 15px;
    }
    
    .menu {
        background-color: rgb(50, 148, 50);
        color: white;
        width: 120px;
        height: 60px;
        text-align: center;
        border-radius: 50px;
        margin: 10px;
        cursor: pointer;
        font-size: 15px;
    }
</style>
<header>
    <form action="" method="post">
        <input type="hidden" name="view" value="usuario">
        <input class="menu" type="submit" value="Usuarios">
    </form>
    <form action="" method="post">
        <input type="hidden" name="view" value="animal">
        <input class="menu" type="submit" value="Animales">
    </form>
    <form action="" method="post">
        <input type="hidden" name="view" value="adopcion">
        <input class="menu" type="submit" value="Adopciones">
    </form>
</header>


<template>
    <div id="app">
        <img src="./assets/img/sigma-logo.png">
        <Titulo/>
        <Cuerpo/>
    </div>
</template>

<script>
import Titulo from './components/Titulo'
import Cuerpo from './components/Cuerpo'
export default {
    name: 'App',
    components: {
        Titulo,
        Cuerpo
    }
}
</script>

<style>
@import url('https://fonts.googleapis.com/css2?family=Roboto:wght@700&display=swap');
#app {
    font-family: Roboto;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
    text-align: center;
    color: #2c3e50;
    margin-top: 60px;
}

#pixels {
    width: 420px;
}
</style>

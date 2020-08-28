<template>
    <div class="Titulo">
        <h3>{{ msg }}</h3>
        <div class="Lorem">
            <p>
                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the<br> industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and<br> scrambled it to make a type specimen
                book.
            </p>
        </div>
    </div>
</template>

<script>
export default {
    name: 'Titulo',
    data() {
        return {
            msg: 'Prueba de desarrollo Sigma'
        }
    }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
h3 {
    color: #000;
    margin-top: 27px;
}

p {
    margin-top: 25px;
}

.Lorem {
    color: #7C7B7C;
    font-size: 15px;
}
</style>

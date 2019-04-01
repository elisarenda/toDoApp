<template>
    <div class="formu" @submit="handleSubmit">
        <form>
            <p>Title: </p>
            <input name="todoTitle" type="text">
            <p>Description: </p>
            <input name="todoDescription" type="text">
            <br>
            <input type="submit" name="submit" value="Submit">
        </form>
    </div>
</template>

<script>
export default {
    name:"formu",
    methods: {
        handleSubmit(e){
            e.preventDefault() 
            //stopper évenement en cours(reload page)
            let todoTitle = e.target.todoTitle.value;
            let todoDescription = e.target.todoDescription.value;
            console.log(todoTitle);
            console.log(todoDescription);
            this.sendData(todoTitle, todoDescription); 
            //pas défini à l'endroit même de la fonction
        },
        sendData(title, description){ 
            //envoie paramètres fonction
            const req = new XMLHttpRequest();
            let query = `todoTitle=${title}&todoDescription=${description}` 
            console.log(query)
            req.open('POST',`http://localhost:8888/test-php/php-pdo/createdata.php?${query}`, false);
            req.send();
            if (req.status === 200 ){
                console.log(req.response)
                this.getData()
            } else {
                console.log('error', req.status, req.statusText)
            }
        }
    },
    props:[
        "getData",
    ]
}
</script>
<style>
</style>

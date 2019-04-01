<template>
    <div class="todo">
        <div class="remove" @click="handleClick">✗</div>
        <div v-if="todo.completed == 'true'" class="titleTrue" @click="completedClick">{{ todo.todoTitle }}</div> 
        <div v-else class="titleFalse" @click="completedClick">{{ todo.todoTitle }}</div> 
        <div class="description">{{ todo.todoDescription }}</div>
        <div class="date">{{new Date (todo.date).toDateString()}}</div>
    </div>
</template>

<script>
export default {
    name: "todo",
    props: ["todo", "getData"], //paramètres ds component
    methods: {
        handleClick(){
            console.log('test')
            let id = this.todo.id; 
            this.removeData(id)
        },
        removeData(removeId){
            console.log('ttest')
            const req = new XMLHttpRequest();
            let query = `id=${removeId}` //=>mm nom php
            console.log(query)
            req.open('POST',`http://localhost:8888/test-php/php-pdo/removedata.php?${query}`, false);
            req.send();
            if (req.status === 200 ){
                console.log(req.response)
                this.getData()
            } else {
                console.log('error', req.status, req.statusText)
            }
        },
        completedClick(){
            let id = this.todo.id;
            let completed = this.todo.completed == 'true' ? 'false' : 'true';
            console.log(id)
            this.updateData(id, completed)
        },
        updateData(id, completed){
            const req = new XMLHttpRequest();
            let query = `id=${id}&completed=${completed}` //=>mm nom que de mon php
            console.log(query)
            req.open('POST',`http://localhost:8888/test-php/php-pdo/update.php?${query}`, false);
            req.send();
            if (req.status === 200 ){
                console.log(req.response)
                this.getData()
            } else {
                console.log('error', req.status, req.statusText)
            }
        }
    }
}

</script>

<style>
.todo{
    width:80%;
    max-width: 600px;
    margin:10px auto;
    padding: 15px;
    border: 1px solid #eee;
    border-radius: 3px;
}
.remove{
    float: right;
    font-size: 25px;
}
.titleTrue{
    text-decoration: line-through;
}
.titleFalse{
    text-decoration: underline;
}
</style>

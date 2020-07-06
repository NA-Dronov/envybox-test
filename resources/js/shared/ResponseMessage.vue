<template>
    <div 
        class="card text-white position-absolute" 
        :class="{'bg-success': response.type == 'success', 'bg-danger': response.type == 'fail'}" 
        style="max-width: 18rem; min-width: 10rem; z-index:10; top: 2rem; right: 2rem;"
    >
        <div class="card-header d-flex">
            <span>{{response.type == 'success' ? 'Успех':'Ошибка'}}</span>
            <a class="ml-auto" @click="$emit('clearResponse');" style="cursor: pointer;">&times;</a>
        </div>
        <div class="card-body">
            <p class="card-text">{{response.message}}</p>
        </div>
    </div>
</template>

<script>
export default {
    props: ['response']
}
</script>
<template>
    <div class="invalid-feedback">
        <ul>
            <li v-for="(error,index) in errors" :key="key(index)">{{error}}</li>
        </ul>
    </div>
</template>

<script>
export default {
    props: ['errors','id'],
    methods: {
        key(index) {
            return `validation_errors_${index}_${this.id}`;
        }
    }
}
</script>
<template>
    <div class="container">
        <div class="row">
            <v-response-msg :response="response" v-if="response" @clearResponse="handleClearResponse"/>
            <div class="card col-md-6 mx-auto mt-5">
                <div class="card-body">
                    <div class="form-group">
                        <label for="name">Имя</label>
                        <input type="text" id="name" name="name" class="form-control" :class="[{ 'is-invalid': errorFor('name') }]" v-model="name">
                        <v-errors :errors="errorFor('name')" :id="'name'"/>
                    </div>
                    <div class="form-group">
                        <label for="phone">Телефон</label>
                        <input type="text" id="phone" name="phone" class="form-control" :class="[{ 'is-invalid': errorFor('phone') }]" v-model="phone">
                        <v-errors :errors="errorFor('phone')" :id="'phone'"/>
                    </div>
                    <div class="form-group">
                        <label for="message">Сообщение</label>
                        <textarea type="text" id="message" name="message" class="form-control" :class="[{ 'is-invalid': errorFor('message') }]" v-model="message"></textarea>
                        <v-errors :errors="errorFor('message')" :id="'message'"/>
                    </div>
                    <button class="btn btn-primary btn-block" @click="send" :disabled="loading">Отправить</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            loading: false,
            errors: null,
            response: null,
            status: null,
            name: null,
            phone: null,
            message: null
        };
    },
    methods: {
        async send() {
            this.loading=true;
            this.errors=null;
            this.response=null;
 
            try {
                const response = await axios.post("/api/claims", {
                    name: this.name,
                    phone: this.phone,
                    message: this.message
                });
                this.response = response.data;
                this.name = null;
                this.phone = null;
                this.message = null;
            } catch (error) {
                if (error.response && error.response.status && error.response.status == 422) {
                    this.errors = error.response.data.errors;
                }
                this.status = error.response.status;
                if (this.status == 500) {
                    this.response = {
                        type: 'fail',
                        message: 'Произошла непредвиденная ошибка на сервере.'
                    };
                }
            }
            this.loading = false;
        },
        errorFor(field) {
            return this.errors !== null && this.errors[field]
                ? this.errors[field]
                : null;
        },
        handleClearResponse() {
            this.response=null;
        }
    }
}
</script>
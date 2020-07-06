<template>
    <div class="container">
        <div class="row">
            <div class="card col-md-6 mx-auto mt-5">
                <div class="card-body">
                    <form>
                        <div class="form-group">
                            <label for="name">Имя</label>
                            <input type="text" id="name" name="name" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="phone">Телефон</label>
                            <input type="text" id="phone" name="phone" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="message">Сообщение</label>
                            <textarea type="text" id="message" name="message" class="form-control"></textarea>
                        </div>
                        <button class="btn btn-primary btn-block">Отправить</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    
}
</script>
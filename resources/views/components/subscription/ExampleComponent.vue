<template>
    <div>
        <input type="text" v-model="message">
        <p>The value of the input is: {{ message }}</p>
    </div>
</template>

<script>
export default {
    data() {
        return {
            message: 'Hello World'
        };
    }
};
</script>
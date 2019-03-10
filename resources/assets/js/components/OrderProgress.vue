<template>
    <div>
        <div class="progress">
          <progressbar :now="progress" type="success" striped animated></progressbar>
        </div>

        <div class="order-status">
            <strong>Status do Pedido:</strong> {{ statusNew }}
        </div>

        <img src="/img/delivery.gif" alt="delivery" v-if="progress == 100">
        <img src="/img/quality_assurance.gif" alt="quality_assurance" v-if="progress == 70">
        <img src="/img/baking.gif" alt="baking" v-if="progress == 50">
        <img src="/img/preparation.gif" alt="preparation" v-if="progress == 30">
        <img src="/img/placed.gif" alt="placed" v-if="progress == 10">
    </div>
</template>

<script>
    import { progressbar } from 'vue-strap'

    export default {
        components: {
            progressbar
        },

        props: ['status', 'initial', 'order_id'],

        data() {
            return {
                statusNew: this.status,
                progress: this.initial
            }
        },

        mounted() {
            console.log(this.progress);
            Echo
                .private('pizza-tracker.' + this.order_id)
                .listen('OrderStatusChanged', (order) => {
                    this.statusNew = order.status_name
                    this.progress = order.status_percent
                });
        }
    }
</script>

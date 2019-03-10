<template>
    <alert v-model="showAlert" placement="top-right" duration="4000" type="success" width="400px" dismissable>
      <span class="icon-ok-circled alert-icon-float-left"></span>
      <strong>Status de Pedido Atualizado</strong>
      <p>Pedido {{ order_id }} Status: {{ order_status }} </p>
    </alert>
</template>

<script>
    import { alert } from 'vue-strap'

    export default {
        components: {
            alert
        },

        props: ['user_id'],

        data() {
            return {
                showAlert: false,
                order_id: '',
                order_status: '',
            }
        },

        mounted() {
            Echo
                .channel('pizza-tracker')
                .listen('OrderStatusChanged', (order) => {
                    if (this.user_id == order.user_id) {
                        this.showAlert = true,
                        this.order_id = order.id,
                        this.order_status = order.status.name
                    }
                });
        }
    }
</script>

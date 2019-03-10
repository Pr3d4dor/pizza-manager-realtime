<template>
    <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
            <i class="fa fa-bell"></i>
            <span class="notification-count label label-danger" v-if="notifications.length > 0">{{ notifications.length }}</span>
            <span class="caret"></span>
        </a>

        <ul class="dropdown-menu dropdown-menu-notifications" role="menu">
            <li v-for="notification in notifications">
                <a :href="notification.url">
                    <div>
                        <i class="fa fa-exclamation-circle fa-fw"></i> {{ notification.description }}
                        <span class="pull-right text-muted small"><timeago :since="notification.time" :auto-update="60"></timeago></span>
                    </div>
                </a>
                <div class="divider"></div>
            </li>
            <li>
                <div class="text-center see-all-notifications">
                    <div v-if="notifications.length <= 0">Sem Notificações</div>
                </div>
            </li>
        </ul>
    </li>

</template>

<script>
    import VueTimeago from 'vue-timeago'

    Vue.use(VueTimeago, {
      name: 'timeago',
      locale: 'pt-BR',
      locales: {
        'pt-BR': require('vue-timeago/locales/pt-BR.json')
      }
    })

    export default {
        props: ['user_id'],

        data() {
            return {
                notifications: []
            }
        },

        mounted() {
            Echo
                .channel('pizza-tracker')
                .listen('OrderStatusChanged', (order) => {
                    if (this.user_id == order.user_id) {
                        this.notifications.unshift({
                            description: 'Pedido ID: ' + order.id + ' atualizado',
                            url: '/orders/' + order.id,
                            time: new Date()
                        })
                    }
                });
        }
    }
</script>

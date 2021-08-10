<template>
    <transition>
        <div class="dialog" v-if="display">
            <div class="dialog-body">
                <p class="dialog-message">
                    <i class="fas fa-exclamation-circle"></i> 本当にアカウントを削除しますか？ <br> 全ての日記が削除されます。<br>この操作は元に戻せません。
                </p>

                <p class="dialog-message">削除ボタンを有効化するために<br>メールアドレスを入力してください。</p>
                <input class="dialog-input" type="text" name="" v-model="mail_input" placeholder="ご登録のメールアドレス">

                <div class="dialog-items">
                    <form class="dialog-item" method="POST" :action="url" :class="{disabled: mail_input!=mail_ref}">
                        <input type="hidden" name="_token" :value="csrf">
                        <a :href="url" @click.prevent="deleteAccount">はい</a>
                    </form>
                    <a href="javascript:void(0)" @click="$emit('denied')" class="dialog-item">いいえ</a>
                </div>
            </div>
        </div>
    </transition>
</template>



<script>
    import { ref, inject } from 'vue'

    export default {
        props: {
            url: '',
            display: false,
        },

        setup(){
            const deleteAccount = (e) => {
                e.target.parentElement.submit();
            }

            const mail_input = ref('');

            const csrf = inject('csrf');
            const mail_ref = inject('mail_ref');

            return {
                deleteAccount,
                csrf,
                mail_input,
                mail_ref,
            }
        }
    }
</script>

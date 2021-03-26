<template>
    <div v-else class="center"><p>{{ noResultMessage }}</p></div>
</template>

<script>
import { mapState } from 'vuex';

export default {
    name: 'NoResultMessage',
    computed: {
        ...mapState(['noResultMessage']),
    },
};
</script>

<style scoped lang="sass">

</style>

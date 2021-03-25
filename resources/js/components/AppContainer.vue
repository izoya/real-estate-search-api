<template>
    <el-container>

        <el-header><h1>Let’s find a perfect house</h1>
        </el-header>

        <el-main>
            <search-form/>
        </el-main>

        <el-footer>
        </el-footer>

    </el-container>
</template>

<script>
import SearchForm from "./SearchForm";

export default {
    name: 'AppContainer',
    components: {SearchForm },
    data: function () {
        return {

        }
    },
    computed: {

    },
    methods: {


    },
    mounted() {

    }
};
</script>

<style scoped lang="sass">

</style>

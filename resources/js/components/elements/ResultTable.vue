<template>
    <el-table
        :data="tableData"
        :default-sort="{prop: 'date', order: 'descending'}"
        style="width: 100%">
        <el-table-column v-for="(value, key) in tableData[0]"
                         :prop="key"
                         :label="capitalize(key)"
                         sortable
                         v-bind:key="key">
        </el-table-column>
    </el-table>
</template>

<script>
export default {
    name: 'ResultTable',
    props: ['tableData'],
    methods: {
        capitalize(string) {
            return _.capitalize(string);
        },
    }
};
</script>

<style scoped lang="sass">

</style>

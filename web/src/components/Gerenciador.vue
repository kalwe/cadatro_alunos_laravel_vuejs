<template>
  <div class="gerenciador">
    <div class="col-1">
      <img :src="image"/>
    </div>
    <div class="col-2">
      <h3>Name: {{ name | properCase }}</h3>
      <select @change="update">
        <option
          v-for="col in [ 'red', 'green' ]"
          :value="col"
          :key="col"
          :selected="col === color ? 'selected' : ''"
        >{{ col | properCase }}</option>
      </select>
      <button @click="del">Deletar</button>
    </div>
  </div>
</template>

<script>
  export default {
    name: 'Gerenciador',
    computed: {
      image() {
        return `/images/${this.color}.png`;
      }
    },
    methods: {
      update(val) {
        this.$emit('update', this.id, val.target.selectedOptions[0].value);
      },
      del() {
        this.$emit('delete', this.id);
      }
    },
    props: ['id', 'color', 'name'],
    filters: {
      properCase(string) {
        return string.charAt(0).toUpperCase() + string.slice(1);
      }
    }
  }
</script>

<style scoped>
h3 {
  margin: 40px 0 0;
}
ul {
  list-style-type: none;
  padding: 0;
}
li {
  display: inline-block;
  margin: 0 10px;
}
a {
  color: #42b983;
}
</style>

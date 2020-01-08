import axios from 'axios'

const API_URL = 'http://localhost:8000/api'

export const http = axios.create({
  baseURL: `${API_URL}`,
  headers: {'Content-Type': 'application/json; charset=utf-8'}
})

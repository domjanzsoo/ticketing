const express = require('express')
const dotenv = require('dotenv')
const morgan = require('morgan')
const exphbs = require('express-handlebars');
const connectDB = require('./config/db')
const routes = require('./routes')

// Load config
dotenv.config({ path: './config/config.env' })

//DB connection
connectDB()

const app = express()

if(process.env.NODE_ENV === 'development'){
        app.use(morgan('dev'))
}

// Hanlebars
app.engine('.hbs', exphbs({defaultLayour: 'main', extname: '.hbs'}))
app.set('view engine', '.hbs')

// Routes
app.use('/', require('./routes/index'))

const PORT = process.env.PORT || 5000


app.listen(PORT,
        console.log(`Server running on ${process.env.NODE_ENV} mode on port ${PORT}`)
        )
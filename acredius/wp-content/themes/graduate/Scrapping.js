const PORT = 3000
const axios = require('axios')
const cheerio = require('cheerio')
const express = require('express')
const fs = require("fs/promises")



const app = express()
const url = 'https://www.moneyhouse.ch/en/'
const articles2 =[]
axios(url)
    .then(response => {
        const html = response.data
        const $ = cheerio.load(html)
        $('.homepage-table-company-name', html).each(function() {
            const CompanyName = $(this).text()
            const url1 = $(this).attr('href')
            const url2 = 'https://www.moneyhouse.ch'+url1
            axios(url2)
              .then(response => {
                  const html = response.data
                  const $ = cheerio.load(html)
               
                      const RegisterNumber = $('.chnr').text()
                      const LegalForm = $('.vertical-middle','.company-legal-form').text()
                      const sector = $('.overview-branch-holder').text()
                      const status = $('.vertical-middle','.company-status').text()
                      const adress = $('p','.l-grid-cell.l-one-third.l-mobile-one-whole.l-tablet-one-whole').text()
                      
                      articles2.push({
                        CompanyName,
                        // url1,
                        // url2,
                        RegisterNumber,
                        LegalForm,
                        sector,
                        status,
                        adress,
                        })     
                        console.log(articles2)  
                        const data = JSON.stringify(articles2, null,2);
                        fs.writeFile("company.txt", data) ; 
                                                 
    })  
                       
})   
}).catch(err => console.log(err))                             
 app.listen(PORT, () => console.log(`server running on port ${PORT}`))

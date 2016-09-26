import unittest
import DriverManager
import LoginTestCase
from selenium import webdriver
from selenium.webdriver.common.keys import Keys
from selenium.webdriver.support.ui import Select

class ArticleCrudTestCase(unittest.TestCase):

    baseUrl = 'http://dev.yuma.sk'

    def setUp(self):

        # Get the driver instance
        self.driver = DriverManager.getDriver()

    ##################################
    # Create the article
    ##################################

    def test_1_create_article(self):

        # Get the driver
        driver = self.driver

        # Login
        unittest.main(module=LoginTestCase, exit=False)

        driver.get(self.baseUrl+'/administrator')
        driver.find_element_by_id('new_article').click()

        title = driver.find_element_by_name('title')
        title.send_keys('Selenium test article')

        alias = driver.find_element_by_name('alias')
        alias.send_keys('selenium_test_article')

        # body = driver.find_element_by_id('article_text')
        # body.send_keys('This is the article text {{!--readmore--}} And this is the rest of the text after readmore')

        status = Select(driver.find_element_by_name('status'))
        status.select_by_value('1')   # Unpublished

        # Handle chosen select jQuery plugin
        driver.find_element_by_id('categories_chosen').click()
        driver.find_element_by_xpath('//li[@data-option-array-index="1"]').click()

        # Save the article
        driver.find_element_by_id('save_and_close').click()

        # Verify if the article was successfully saved ..
        messageElem = driver.find_element_by_css_selector('#fouc > div > div.status-message > div > ul > li')
        assert messageElem.text == 'Article was successfully saved!'

        # Get the ID of the saved article
        self.__class__.articleID = driver.find_element_by_css_selector('tr.odd:nth-child(1) > td:nth-child(1)').text

    ##################################
    # Update the article
    ##################################

    def test_2_update_article(self):

        driver = self.driver

        # Open the newly created article
        driver.get(self.baseUrl+'/administrator/article/'+ self.__class__.articleID+'/edit')

        # Press the save button
        driver.find_element_by_id('save').click()

        # Verify if the article was successfully saved ..
        messageElem = driver.find_element_by_css_selector('#fouc > div > form:nth-child(1) > div.status-message > div > ul > li')
        assert messageElem.text == 'Article was successfully saved!'

    ##################################
    # Trash the article
    ##################################

    def test_3_trash_article(self):

        driver = self.driver

        # Trash article
        driver.get(self.baseUrl+'/administrator/article')
        driver.find_element_by_id('actions_container_' + str(self.__class__.articleID)).click()
        driver.find_element_by_id('trash_'+str(self.__class__.articleID)).click()

        # Wait for the message to be displayed on the page
        driver.implicitly_wait(1)  # seconds

        # Verify the article is in the trash
        message = driver.find_element_by_css_selector('.alert > ul:nth-child(1) > li:nth-child(1)')
        assert message.text == "The article was successfully trashed!"

if __name__ == "__main__":
    unittest.main()

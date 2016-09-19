import unittest
import DriverManager
from selenium import webdriver
from selenium.webdriver.common.keys import Keys
from selenium.webdriver.support.ui import Select

class CreateArticleTestCase(unittest.TestCase):

    def setUp(self):
        self.driver = DriverManager.getDriver()

    def test_create_article(self):
        driver = self.driver
        driver.get('http://dev.yuma.sk/administrator')
        driver.find_element_by_id('new_article').click()

        title = driver.find_element_by_name('title')
        title.send_keys('Selenium test article')

        alias = driver.find_element_by_name('alias')
        alias.send_keys('selenium_test_article')

        # body = driver.find_element_by_id('article_text')
        # body.send_keys('This is the article text {{!--readmore--}} And this is the rest of the text after readmore')

        status = Select(driver.find_element_by_name('status'))
        status.select_by_value('1')   # Unpublished

        categories = Select(driver.find_element_by_id('categories'))
        categories.select_by_value('4')   # Blog

        driver.find_element_by_name('action').click()


if __name__ == "__main__":
    unittest.main()

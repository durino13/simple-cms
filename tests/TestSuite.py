import unittest
import LoginTestCase
import ArticleCrudTestCase

# Create the loader and the suite
loader = unittest.TestLoader()
suite = unittest.TestSuite()

# Add the test cases into the suite
suite.addTest(loader.loadTestsFromModule(LoginTestCase))
suite.addTest(loader.loadTestsFromModule(ArticleCrudTestCase))

# Run the suite
runner = unittest.TextTestRunner(verbosity=3)
result = runner.run(suite)
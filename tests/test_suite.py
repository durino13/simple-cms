import unittest
import LoginTestCase
import CreateArticleTestCase

# Create the loader and the suite
loader = unittest.TestLoader()
suite = unittest.TestSuite()

# Add the test cases into the suite
suite.addTest(loader.loadTestsFromModule(LoginTestCase))
suite.addTest(loader.loadTestsFromModule(CreateArticleTestCase))

# Run the suite
runner = unittest.TextTestRunner(verbosity=3)
result = runner.run(suite)
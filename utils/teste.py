import logging

logging.basicConfig(
    level=logging.DEBUG,
    format='(%(asctime)s) [%(levelname)s] %(message)s',
    filename="teste.log"
)

logging.debug('This message should go to the log file')
logging.info('So should this')
logging.warning('And this, too')
logging.error('And non-ASCII stuff, too, like Øresund and Malmö')

